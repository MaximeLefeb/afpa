import { AlertService } from './../../service/Alert.service';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { AppService } from './../../app.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  alert = this.alertService.alert;

  constructor(
    private router:Router,
    private appService:AppService,
    private alertService:AlertService,
    private SpinnerService:NgxSpinnerService) {}

  ngOnInit():void {
    if (localStorage.length != 0) {
      this.router.navigate(['/']);
    }
  }

  onSubmit(form:NgForm) {
    this.SpinnerService.show();

    const email    = form.value['Email'];
    const password = form.value['Password'];

    this.appService.login(email, password).subscribe(data => {
      this.alert = true;
      this.router.navigate(['/']);
    }, error => {
      this.SpinnerService.hide();
      this.alert = true;
    });
  }
}
