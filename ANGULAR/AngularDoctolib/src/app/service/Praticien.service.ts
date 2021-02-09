import { Router } from '@angular/router';
import { Injectable } from "@angular/core";
import { NgxSpinnerService } from 'ngx-spinner';
import { HttpClient } from "@angular/common/http";
import { Praticien } from "../model/Praticien.model";

@Injectable({
  providedIn : 'root'
})
export class PraticienService {

  constructor(
    private router:Router,
    private http:HttpClient,
    private SpinnerService:NgxSpinnerService) {}

  getAllPraticiens() {
    let listePraticien = this.http.get<Praticien[]>("http://localhost:8000/praticiens", {
      observe : 'body',
    })
    return listePraticien;
  }

  getPraticien(id) {
    let praticienFound = this.http.get<Praticien>("http://localhost:8000/praticien/" + id, {
      observe : 'body',
    })
    return praticienFound;
  }

  DelPraticien(id) {
    this.http.delete<Praticien>("http://localhost:8000/praticien/" + id, {
      observe : 'body',
    }).subscribe((response) => {
      console.log('Succesfully delete. ' + response);
    }, (error) => {
      console.log(error);
    })
  }

  AddPraticien(mail:string, nom:string, prenom:string, specialite:string, password:string) {
    this.http.post<Praticien[]>("http://localhost:8000/praticiens", {
      email     : mail,
      nom       : nom,
      prenom    : prenom,
      specialite: specialite,
      password  : password
    }, {
      observe  : 'response',
    }).subscribe((response) => {
      console.log(response);
    }, (error) => {
      console.log(error);
    })
  }

  PutPraticien(id:number, mail:string, nom:string, prenom:string, specialite:string, password:string) {
    this.http.put<Praticien[]>("http://localhost:8000/praticien/" + id, {
      email     : mail,
      nom       : nom,
      prenom    : prenom,
      specialite: specialite,
      password  : password,
    }, {
      observe  : 'response',
    }).subscribe((response) => {
      console.log(response);
      this.SpinnerService.hide();
      this.router.navigate(['/account']);
    }, (error) => {
      console.log(error);
    })
  }
}
