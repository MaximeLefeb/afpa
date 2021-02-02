import { Praticien } from './../../model/Praticien.model';
import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-praticiens',
  templateUrl: './praticiens.component.html',
  styleUrls: [
    './praticiens.component.css'
  ]
})
export class PraticiensComponent {
  //* Get praticien detail
  @Input() Praticien:Praticien;

  constructor() {}
}
