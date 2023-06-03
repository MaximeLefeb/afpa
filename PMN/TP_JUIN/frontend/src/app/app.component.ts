import { Component } from '@angular/core';
import { PersonService } from './services/person.service';
import { CitationService } from './services/citation.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title   : String = 'angular_pmn';
  date    : String = new Date().toLocaleDateString('fr-fr', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' });
  colors  : Array<string> = ['#DF80AC', '#579FF4', '#098E27', '#FCB325'];
  color   : string = this.colors[Math.floor(Math.random() * this.colors.length)];
  isLoading: boolean = true;
  person  : any;
  citation: any;

  constructor(
    private PersonService: PersonService,
    private CitationService: CitationService
  ) { }

  ngOnInit() {
    this.loadData();
  }

  async loadData() {
    this.PersonService.getRandomPerson().subscribe(person => {
      this.person = person;
      this.checkLoadingStatus();
    });

    this.CitationService.getRandomQuote().subscribe(citation => {
      this.citation = citation;
      this.checkLoadingStatus();
    });
  }

  checkLoadingStatus() {
    if (this.person && this.citation) {
      this.isLoading = false;
    }
  }

  capitalize = (str:String) => {
    return str.charAt(0).toUpperCase() + str.slice(1);
  }
}
