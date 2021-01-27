import { rendererTypeName } from '@angular/compiler';
import { Directive, ElementRef, HostListener, Input, OnChanges, OnInit, SimpleChanges } from '@angular/core';

@Directive({
  selector: '[colorMe]'
})
export class ColorfullDirective implements OnInit, OnChanges {
  @Input() color:string;

  @HostListener('mouseenter')
  mouseenter() {
    this.elementRef.nativeElement.style.backgroundColor = this.color;
  }
  @HostListener('mouseout')
  mouseout() {
    this.elementRef.nativeElement.style.backgroundColor = 'transparent';
  }

  constructor(private elementRef: ElementRef) {}

  ngOnChanges(changes: SimpleChanges) {
    console.log(changes)
  }

  ngOnInit() {
    console.log('Init star !')
  }
}
