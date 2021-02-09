import { Component, OnInit } from "@angular/core";
import { PatientService } from './../../service/Patient.service';
import { PraticienService } from './../../service/Praticien.service';

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

  constructor(
    private patientService:PatientService,
    private praticienService:PraticienService) {}
}
