import { NgxSpinnerService } from 'ngx-spinner';
import { Component, OnInit } from '@angular/core';
import { Praticien } from './../../../model/Praticien.model';
import { PraticienService } from './../../../service/Praticien.service';

@Component({
  selector: 'app-list-praticiens',
  templateUrl: './listPraticiens.component.html',
  styleUrls: [
    './listPraticiens.component.css'
  ]
})
export class ListPraticiensComponent implements OnInit {
  allPraticiens:Praticien[];

  constructor(
    private SpinnerService:NgxSpinnerService,
    private praticienService:PraticienService
  ) {}

  ngOnInit():void {
    this.SpinnerService.show();
    this.praticienService.getAllPraticiens().subscribe((response) => {
      this.allPraticiens = response;
      this.SpinnerService.hide();
    }, (error) => {
      console.log(error);
      this.SpinnerService.hide();
    })
  }
}
