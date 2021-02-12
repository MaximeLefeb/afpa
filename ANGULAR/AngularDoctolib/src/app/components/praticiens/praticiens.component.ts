import { Component, Input, OnInit } from '@angular/core';
import { Praticien } from '../../model/Praticien.model';

@Component({
  selector: 'app-praticien',
  templateUrl: './praticiens.component.html',
  styleUrls: [
    './praticiens.component.css'
  ]
})
export class PraticiensComponent implements OnInit {
  //* Get praticien detail
  @Input() Praticien:Praticien;

  ngOnInit():void {}
  constructor() {}
}
