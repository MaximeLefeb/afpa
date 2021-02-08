import { map } from 'rxjs/operators';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn : 'root'
})
export class AppService {

  constructor(private http:HttpClient) {}

  login(mail:string, pwd:string) {
    return  this.http.post("http://localhost:8000/api/logincheck", {
      username : mail,
      password : pwd,
    }).pipe(map(response => {
      if (response) {
        localStorage.setItem('jwt', JSON.stringify(response));
      }
    }));
  }

  public logout() {
    localStorage.removeItem('jwt');
  }
}
