import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Patient } from "./model/Patient.model";

@Injectable({
  providedIn: 'root'
})
export class AppService {
  listPatients:Patient[];

  constructor(private http: HttpClient) {
    /* this.http.get<Patient[]>("http://localhost:8000/patients").subscribe((response) => {
      console.log(response);
      this.listPatients = response;
    },(error) => {
      console.log(error)
    }) */

    /* this.http.post<Patient[]>("http://http://localhost:8000/patients", {
      email : "lefebMaxi@gmail.com",
      nom : "Maxime",
      prenom : "Lefebvre",
      age : 21,
      password : "TestMdp123"
    }, {
      observe : 'response'
    }).subscribe((response) => {
      console.log(response);
      this.listPatients = response.body;
    }, (error) => {
      console.log(error);
    }) */
  }
}
