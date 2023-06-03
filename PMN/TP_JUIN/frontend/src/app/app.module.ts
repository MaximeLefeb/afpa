import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { BirthdayComponent } from './components/birthday/birthday.component';
import { CitationComponent } from './components/citation/citation.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    BirthdayComponent,
    CitationComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
