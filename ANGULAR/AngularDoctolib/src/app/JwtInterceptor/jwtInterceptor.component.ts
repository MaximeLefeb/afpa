import { Observable } from 'rxjs';
import { HttpEvent, HttpHandler, HttpInterceptor, HttpRequest } from "@angular/common/http";
import { Injectable } from "@angular/core";

@Injectable()
export class JwtInterceptor implements HttpInterceptor {

  intercept(request:HttpRequest<any>, next:HttpHandler):Observable<HttpEvent<any>> {
    let jwt = JSON.parse(localStorage.getItem('jwt'));
    if (jwt) {
      request = request.clone({
        setHeaders: {
          Authorization: `Bearer $(jwt)`
        }
      });
    }
    return next.handle(request);
  }
}
