import { NgxSpinnerService } from 'ngx-spinner';
import { Component, Input, OnInit } from '@angular/core';
import { RdvService } from './../../../service/Rdv.service';

@Component({
  selector: 'app-rdv',
  templateUrl: './rdv.component.html',
  styleUrls: [
    './rdv.component.css'
  ]
})
export class RdvComponent implements OnInit {
  userInfo = JSON.parse(localStorage.getItem('userInfo'));
  type     = JSON.parse(localStorage.getItem('type'));
  @Input() namePraticien:string;
  @Input() namePatient:string;
  @Input() rdvs:any;

  constructor(
    private rdvService:RdvService,
    private SpinnerService:NgxSpinnerService,
  ) {}

  ngOnInit():void {}

  public deleteRdv(id) {
    this.rdvService.DelRdv(id);
  }
}
