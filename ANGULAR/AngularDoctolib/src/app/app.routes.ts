import { IndexComponent } from './components/index/index.component';
import { AppComponent } from './app.component';
import { RouterModule, Routes } from "@angular/router";
import { NgModule } from '@angular/core';

const ROUTES:Routes = [
  {path : "index", component : IndexComponent},
  {path : "", component : AppComponent},
]

@NgModule({
  imports: [RouterModule.forRoot(ROUTES)],
  exports: [RouterModule]
})
export class AppRoutingModule {

}
