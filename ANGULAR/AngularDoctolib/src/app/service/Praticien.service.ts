import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Praticien } from "../model/Praticien.model"

@Injectable({
  providedIn : 'root'
})
export class PraticienService {

  constructor(private http:HttpClient) {}

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
    })
  }

  AddPraticien(mail:string, nom:string, prenom:string, specialite:string, password:string) {
    this.http.post<Praticien[]>("http://localhost:8000/praticiens", {
      email    : mail,
      nom      : nom,
      prenom   : prenom,
      age      : specialite,
      password : password,
      observe  : 'response'
    })
  }

  PutPraticien(id:number, mail:string, nom:string, prenom:string, specialite:string, password:string) {
    this.http.put<Praticien[]>("http://localhost:8000/praticien/" + id, {
      email    : mail,
      nom      : nom,
      prenom   : prenom,
      age      : specialite,
      password : password,
      observe  : 'response'
    })
  }
}
