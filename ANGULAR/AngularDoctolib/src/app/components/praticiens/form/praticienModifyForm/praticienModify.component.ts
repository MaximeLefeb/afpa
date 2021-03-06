import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { NgxSpinnerService } from 'ngx-spinner';
import { Component, OnInit } from '@angular/core';
import { Praticien } from 'src/app/model/Praticien.model';
import { PraticienService } from './../../../../service/Praticien.service';

@Component({
  selector: 'app-modification-praticien',
  templateUrl: './praticienModify.component.html',
  styleUrls: ['./praticienModify.component.css']
})
export class PraticienModifyComponent implements OnInit {
  userInfo = JSON.parse(localStorage.getItem('userInfo'));
  praticien :Praticien;

  constructor(
    private router:Router,
    private SpinnerService:NgxSpinnerService,
    private praticienService:PraticienService) { }

  ngOnInit(): void {
    if (localStorage.length == 0) {
      this.router.navigate(['/login']);
    }
  }

  onSubmit(form: NgForm) {
    const id         = this.userInfo.id;
    const email      = form.value['Email'];
    const nom        = form.value['Nom'];
    const prenom     = form.value['Prenom'];
    const specialite = form.value['Specialite'];
    const password   = form.value['Password'];

    this.SpinnerService.show();
    this.praticienService.PutPraticien(id, email, nom, prenom, specialite, password);
  }
}
