import { searchResultComponent } from './components/searchResult/searchResult.component';
import { IndexComponent } from './components/index/index.component';
import { AppComponent } from './app.component';
import { RouterModule, Routes } from "@angular/router";
import { NgModule, Component } from '@angular/core';

const ROUTES:Routes = [
  {path : "search", component : searchResultComponent},
  {path : "index", component : IndexComponent},
  {path : "", component : AppComponent},
]

@NgModule({
  imports: [RouterModule.forRoot(ROUTES)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
