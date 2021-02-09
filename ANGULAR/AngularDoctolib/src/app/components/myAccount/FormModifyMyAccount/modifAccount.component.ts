import { Component, OnInit } from "@angular/core";

@Component({
  selector : 'app-ModifyAccount',
  templateUrl : './modifAccount.component.html',
  styleUrls : ['./modifAccount.component.css']
})
export class ModifAccountComponent implements OnInit {
  userInfo = JSON.parse(localStorage.getItem('userInfo'));
  type     = JSON.parse(localStorage.getItem('type'));

  constructor() {}
  ngOnInit():void {}

}
