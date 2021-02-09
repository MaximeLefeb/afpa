import { map } from 'rxjs/operators';
import { Injectable } from '@angular/core';
import { NgxSpinnerService } from 'ngx-spinner';
import { HttpClient } from '@angular/common/http';
import { AlertService } from './service/Alert.service';

@Injectable({
  providedIn : 'root'
})
export class AppService {

  constructor(
    private http:HttpClient,
    private alertService:AlertService,
    private SpinnerService:NgxSpinnerService) {}

  public login(mail:string, pwd:string) {
    return  this.http.post("http://localhost:8000/api/logincheck", {
      username : mail,
      password : pwd,
    }).pipe(map(response => {
      if (response) {
        this.getUserInfo(mail).subscribe((userInfo) => {
          localStorage.setItem('userInfo', JSON.stringify(userInfo));
          this.SpinnerService.hide();
        },(error) => {
          this.SpinnerService.hide();
          this.alertService.alert = true;
          console.log(error);
        });

        localStorage.setItem('jwt', JSON.stringify(response));
      }
    }));
  }

  public logout() {
    localStorage.removeItem('jwt');
    localStorage.removeItem('userInfo');
  }

  public getUserInfo(email:string) {
    return this.http.get("http://localhost:8000/user/" + email, {
      observe : 'body',
    });
  }
}
