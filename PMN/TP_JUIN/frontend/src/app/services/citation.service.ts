import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Citation } from '../models/citation.model';

@Injectable({
  providedIn: 'root'
})
export class CitationService {
  constructor(private http: HttpClient) { }

  getRandomQuote() {
    return this.http.get<Citation>("http://localhost:3000/citation/random");
  }
}
