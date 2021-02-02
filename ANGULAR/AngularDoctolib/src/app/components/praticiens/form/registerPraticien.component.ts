import { NgForm } from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { PraticienService } from './../../../service/Praticien.service';

@Component({
  selector : 'app-register-praticien',
  templateUrl : './registerPraticien.component.html',
  styleUrls : ['./registerPraticien.component.css']
})
export class RegisterPraticienComponent implements OnInit {
  ngOnInit() {}
  constructor(private praticienService:PraticienService) {}

  onSubmit(form:NgForm) {
    const email    = form.value['Email'];
    const nom      = form.value['Nom'];
    const prenom   = form.value['Prenom'];
    const spe      = form.value['Specialite'];
    const password = form.value['Password'];

    this.praticienService.AddPraticien(email, nom, prenom, spe, password);
  }
}
