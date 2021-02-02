import { NgxSpinnerService } from 'ngx-spinner';
import { AppService } from 'src/app/app.service';
import { Component, OnInit } from '@angular/core';
import { Praticien } from './../../model/Praticien.model';
import { PraticienService } from './../../service/Praticien.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-searchResult',
  templateUrl: './searchResult.component.html',
  styleUrls: [
    './searchResult.component.css'
  ]
})
export class searchResultComponent implements OnInit {
  allPraticiens:Praticien[];
  filteredPraticiens:Praticien[] = [];
  research:string;

  constructor(
    private praticienService:PraticienService,
    private SpinnerService:NgxSpinnerService,
    private route:ActivatedRoute) {
  }

  ngOnInit():void {
    this.SpinnerService.show();

    this.route.queryParams.subscribe(params => {
      this.research = params.search;
    });

    this.praticienService.getAllPraticiens().subscribe((response) => {
      this.allPraticiens = response;

      for (let praticien of this.allPraticiens) {
        if(praticien.specialite.match(this.research) || praticien.nom.match(this.research) || praticien.prenom.match(this.research)) {
          this.filteredPraticiens.push(praticien);
        }
      }

      this.SpinnerService.hide();
    }, (error) => {
      console.log(error);
    });
  }
}
