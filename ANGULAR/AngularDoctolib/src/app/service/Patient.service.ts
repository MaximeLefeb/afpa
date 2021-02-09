import { Router } from '@angular/router';
import { Injectable } from "@angular/core";
import { NgxSpinnerService } from 'ngx-spinner';
import { Patient } from "../model/Patient.model";
import { HttpClient } from "@angular/common/http";

@Injectable({
  providedIn : 'root'
})
export class PatientService {

  constructor(
    private router:Router,
    private http:HttpClient,
    private SpinnerService:NgxSpinnerService) {}

  getAllPatients() {
    let listePatient = this.http.get<Patient[]>("http://localhost:8000/patients", {
      observe : 'body',
    })
    return listePatient;
  }

  getPatient(id) {
    let patientFound = this.http.get<Patient>("http://localhost:8000/patient/" + id, {
      observe : 'body',
    })
    return patientFound;
  }

  DelPatient(id) {
    this.http.delete<Patient>("http://localhost:8000/patient/" + id, {
      observe : 'body',
    }).subscribe((response) => {
      console.log('Succesfully delete. ' + response);
    }, (error) => {
      console.log(error);
    })
  }

  AddPatient(mail:string, nom:string, prenom:string, age:number, password:string) {
    this.http.post<Patient[]>("http://localhost:8000/patients", {
      email    : mail,
      nom      : nom,
      prenom   : prenom,
      age      : age,
      password : password,
    }, {
      observe  : 'response',
    }).subscribe((response) => {
      console.log(response);
    }, (error) => {
      console.log(error);
    })
  }

  PutPatient(id:number, mail:string, nom:string, prenom:string, age:number, password:string) {
    this.http.put<Patient[]>("http://localhost:8000/patient/" + id, {
      email    : mail,
      nom      : nom,
      prenom   : prenom,
      age      : age,
      password : password,
    }, {
      observe : 'body'
    }).subscribe((response) => {
      console.log(response);
      this.SpinnerService.hide();
      this.router.navigate(['/account']);
    }, (error) => {
      console.log(error);
    })
  }
}
