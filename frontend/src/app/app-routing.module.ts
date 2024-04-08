import { GameComponent } from './components/game-page/game-page.component';
import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { HomeComponent } from './components/home/home.component';
import { StoreComponent } from './components/store/store.component';
import { AuthGuard } from './shared/services/auth.guard';
import { User } from './shared/services/user.service';
import { CategoryPageComponent } from './components/category-page/category-page.component';

const routes: Routes = [
  
  { path: '', redirectTo: 'home/store', pathMatch: 'full' },
  { path: 'login', component: LoginComponent },
  { path: 'register', component: RegisterComponent },
  { path: 'home', component: HomeComponent,
  children:[
    { path: 'store', component: StoreComponent },
  ] },
  { path: 'game/:id', component: GameComponent},
  { path: 'games/:genre', component: CategoryPageComponent}
];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
