import { Routes } from "@angular/router";
import { AppComponent } from "./app.component";

const ROUTES:Routes = [
  {path : "",         component : AppComponent},
  {path : "myRdvs",   component : AppComponent},
  {path : "login",    component : AppComponent},
  {path : "register", component : AppComponent},
  {path : "takeRdv",  component : AppComponent},
  {path : "rdvs:idRdv",  component : AppComponent},
]

//! <li routerLinkActiveOptions="{exact:true}" routerLinkActive="active"><a [routerLink]="[]> Register </a></li>"
//! <li routerLinkActiveOptions="{exact:true}" routerLinkActive="active"><a [routerLink]="[/myRdvs]> Mes rendez-cous </a></li>"
//! <li routerLinkActiveOptions="{exact:true}" routerLinkActive="active"><a [routerLink]="[/login]> Login </a></li>"
//! <li routerLinkActiveOptions="{exact:true}" routerLinkActive="active"><a [routerLink]="[/register]> Register </a></li>"
//! <li routerLinkActiveOptions="{exact:true}" routerLinkActive="active"><a [routerLink]="[/takeRdv]> Prendre rendez-vous </a></li>"
