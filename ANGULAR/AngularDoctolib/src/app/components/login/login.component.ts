import { NgForm } from '@angular/forms';
import { AppService } from './../../app.service';
import { Component, OnInit } from '@angular/core';
import { NgxSpinnerService } from 'ngx-spinner';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  constructor(
    private router:Router,
    private appService:AppService,
    private SpinnerService:NgxSpinnerService) {}

  ngOnInit(): void {}

  onSubmit(form:NgForm) {
    this.SpinnerService.show();

    const email    = form.value['Email'];
    const password = form.value['Password'];

    this.appService.login(email, password).subscribe(data => {
      this.router.navigate(['/']);
    }, error => {
      console.log(error);
      //! SET ALERT DANGER
    });
  }
}
