import { NgForm } from '@angular/forms';
import { NgxSpinnerService } from 'ngx-spinner';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Praticien } from 'src/app/model/Praticien.model';
import { RdvService } from './../../../service/Rdv.service';
import { PraticienService } from './../../../service/Praticien.service';

@Component({
  selector: 'app-setRdv',
  templateUrl: './setRdv.component.html',
  styleUrls: [
    './setRdv.component.css'
  ]
})
export class SetRdvComponent implements OnInit {
  userInfo = JSON.parse(localStorage.getItem('userInfo'));
  type     = JSON.parse(localStorage.getItem('type'));
  date     = new Date().toISOString().slice(0,10);
  praticien:Praticien;

  constructor(
    private router:Router,
    private route:ActivatedRoute,
    private rdvService:RdvService,
    private SpinnerService:NgxSpinnerService,
    private praticienService:PraticienService
  ) {}

  ngOnInit():void {
    this.SpinnerService.show();

    if (this.type == 'patient') {
      this.route.queryParams.subscribe(params => {
        let id:number = params.doctor;
        this.praticienService.getPraticien(id).subscribe((response) => {
          this.praticien = (response);
          this.SpinnerService.hide();
        }, (error) => {
          console.log(error);
        });
      });
    } else {
      this.router.navigate(['/']);
    }
  }

  onSubmit(form:NgForm) {
    const date = form.value['Date'];
    const addr = form.value['Adresse'];

    this.rdvService.AddRdv(
      date,
      addr,
      this.userInfo.id,
      this.praticien.id
    );
    this.router.navigate(['/myAccount']);
  }
}
