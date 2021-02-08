import { NgForm } from '@angular/forms';
import { AppService } from './../../app.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  constructor(private appService:AppService) {}

  ngOnInit(): void {}

  onSubmit(form:NgForm) {
    const email    = form.value['Email'];
    const password = form.value['Password'];

    this.appService.login(email, password).subscribe(data => {
      console.log(JSON.parse(localStorage.getItem('jwt')));
    }, error => {
      console.log(error);
    });
  }
}
