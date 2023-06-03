import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-citation',
  templateUrl: './citation.component.html',
  styleUrls: ['./citation.component.css']
})
export class CitationComponent {
  @Input() citation: any;
  @Input() bgcolor: any;

  imgBaseUrl: String = 'assets/img/';
  colors: any = {
    '#DF80AC': `${this.imgBaseUrl}character_1.svg`,
    '#579FF4': `${this.imgBaseUrl}character_2.svg`,
    '#098E27': `${this.imgBaseUrl}character_3.svg`,
    '#FCB325': `${this.imgBaseUrl}character_4.svg`
  };
  img: any;

  ngOnInit() {
    this.img = this.colors[this.bgcolor];
  }
}
