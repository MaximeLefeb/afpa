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
  type     = JSON.parse(localStorage.getItem('type'));

  ngOnInit():void {}

  constructor(
    private patientService:PatientService,
    private praticienService:PraticienService) {}

  public deleteAccount(id:number) {
    if (this.type == 'praticien') {
      this.praticienService.DelPraticien(id);
    } else {
      this.patientService.DelPatient(id);
    }
  }
}
