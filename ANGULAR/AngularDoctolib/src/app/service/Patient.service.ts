import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Patient } from "../model/Patient.model"

@Injectable({
  providedIn : 'root'
})
export class PatientService {

  constructor(private http:HttpClient) {}

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
    }, (error) => {
      console.log(error);
    })
  }
}
