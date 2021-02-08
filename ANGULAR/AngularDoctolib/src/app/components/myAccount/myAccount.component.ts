import { Component, OnInit } from "@angular/core";

@Component({
  selector : 'app-myAccount',
  templateUrl : './myAccount.component.html',
  styleUrls : ['./myAccount.component.css']
})
export class MyAccountComponent implements OnInit {
  userInfo = JSON.parse(localStorage.getItem('userInfo'));

  ngOnInit():void {
    console.log(localStorage);
  }

  constructor() {}
}
