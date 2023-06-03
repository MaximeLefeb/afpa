import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Person } from '../models/person.model';

@Injectable({
  providedIn: 'root'
})
export class PersonService {
  constructor(private HttpClient: HttpClient) { }

  getRandomPerson() {
    return this.HttpClient.get<Person>("http://localhost:3000/person/birthdate");
  }
}
