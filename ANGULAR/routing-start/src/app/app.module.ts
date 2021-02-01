import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';


import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { UsersComponent } from './users/users.component';
import { ServersComponent } from './servers/servers.component';
import { UserComponent } from './users/user/user.component';
import { EditServerComponent } from './servers/edit-server/edit-server.component';
import { ServerComponent } from './servers/server/server.component';
import { ServersService } from './servers/servers.service';
import { RouterModule, Routes } from '@angular/router';
import { NotFoundComponent } from './not-found/not-found.component';

const ROUTES: Routes = [
  {path: "", component: HomeComponent},
  {path: "users",
    component: UsersComponent,
    children: [
      {path: ":idUser/:nameUser", component: UserComponent}
    ]

  },
  {path: "servers",
    component: ServersComponent,
    children:[
      {path: ":idServer", component:ServerComponent},
      {path:":idServer/edit", component: EditServerComponent}
    ]
  },
  {path: "404", component:NotFoundComponent},
  {path: "**", redirectTo:"404"}
]

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    UsersComponent,
    ServersComponent,
    UserComponent,
    EditServerComponent,
    ServerComponent,
    NotFoundComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    RouterModule.forRoot(ROUTES)
  ],
  providers: [ServersService],
  bootstrap: [AppComponent]
})
export class AppModule { }