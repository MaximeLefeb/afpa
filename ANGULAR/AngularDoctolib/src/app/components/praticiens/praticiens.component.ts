import { Component, Input } from '@angular/core';
import { Praticien } from '../../model/Praticien.model';

@Component({
  selector: 'app-praticien',
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
