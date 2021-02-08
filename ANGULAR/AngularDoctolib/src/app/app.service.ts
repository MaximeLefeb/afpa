import { NgxSpinnerService } from 'ngx-spinner';
import { map } from 'rxjs/operators';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn : 'root'
})
export class AppService {

  constructor(
    private http:HttpClient,
    private SpinnerService:NgxSpinnerService) {}

  public login(mail:string, pwd:string) {
    return  this.http.post("http://localhost:8000/api/logincheck", {
      username : mail,
      password : pwd,
    }).pipe(map(response => {
      this.SpinnerService.show();

      if (response) {
        this.getUserInfo(mail).subscribe((userInfo) => {
          localStorage.setItem('userInfo', JSON.stringify(userInfo));
          this.SpinnerService.hide();
        },(error) => {
          //! SET ALERT DANGER
          this.SpinnerService.hide();
          console.log(error);
        });

        localStorage.setItem('jwt', JSON.stringify(response));
      }
    }));
  }

  public logout() {
    localStorage.removeItem('jwt');
    localStorage.removeItem('userInfo');
    //! REDIRECT TO INDEX
  }

  public getUserInfo(email:string) {
    return this.http.get("http://localhost:8000/user/" + email, {
      observe : 'body',
    });
  }
}
