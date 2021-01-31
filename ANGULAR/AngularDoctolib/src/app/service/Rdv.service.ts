import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Rdv } from "../model/Rdv.model"

@Injectable({
  providedIn : 'root'
})
export class RdvService {

  constructor(private http:HttpClient) {}

  getAllRdvs() {
    let listeRdv = this.http.get<Rdv[]>("http://localhost:8000/rdvs", {
      observe : 'body',
    })
    return listeRdv;
  }

  getRdv(id) {
    let rdvFound = this.http.get<Rdv>("http://localhost:8000/rdv/" + id, {
      observe : 'body',
    })
    return rdvFound;
  }

  getRdvByIdPatient(id) {
    let rdvFound = this.http.get<Rdv>("http://localhost:8000/rdv/patient" + id, {
      observe : 'body',
    })
    return rdvFound;
  }

  getRdvByIdPraticien(id) {
    let rdvFound = this.http.get<Rdv>("http://localhost:8000/rdv/praticien" + id, {
      observe : 'body',
    })
    return rdvFound;
  }

  DelRdv(id) {
    this.http.delete<Rdv>("http://localhost:8000/rdv/" + id, {
      observe : 'body',
    })
  }

  AddRdv(dateRdv:string, adresse:string, patient:number, praticien:number) {
    this.http.post<Rdv[]>("http://localhost:8000/rdvs", {
      dateRdv  : dateRdv,
      adresse  : adresse,
      patient  : patient,
      praticien: praticien,
      observe  : 'response'
    })
  }
}
