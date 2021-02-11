import { NgxSpinnerService } from 'ngx-spinner';
import { Component, Input, OnChanges, OnInit, Output } from '@angular/core';
import { PatientService } from './../../service/Patient.service';
import { PraticienService } from './../../service/Praticien.service';

@Component({
  selector: 'app-rdvs',
  templateUrl: './rdvs.component.html',
  styleUrls: [
    './rdvs.component.css'
  ]
})
export class RdvsComponent implements OnChanges {
  userInfo = JSON.parse(localStorage.getItem('userInfo'));
  type     = JSON.parse(localStorage.getItem('type'));
  @Input() namePraticien:string;
  @Input() namePatient:string;
  @Input() rdvs:any;

  constructor(
    private patientService:PatientService,
    private SpinnerService:NgxSpinnerService,
    private praticienService:PraticienService,
  ) {}

  ngOnChanges():void {
  }
}
