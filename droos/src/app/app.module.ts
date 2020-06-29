import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { TeacherProfileComponent } from './teacher-profile/teacher-profile.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { AnimalsComponent } from './animals/animals.component';
import { HomeComponent } from './home/home.component';
import { AnimalDetailComponent } from './animal-detail/animal-detail.component';

@NgModule({
  declarations: [
    AppComponent,
    TeacherProfileComponent,
    AnimalsComponent,
    HomeComponent,
    AnimalDetailComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    NgbModule.forRoot()
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
