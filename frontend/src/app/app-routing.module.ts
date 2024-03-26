import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { HomeComponent } from './components/home/home.component';
import { StoreComponent } from './components/store/store.component';
import { AuthGuard } from './shared/services/auth.guard';
import { User } from './shared/services/user.service';
import { GameTableComponent } from './components/store/game-table/game-table.component';
import { GameComponent } from './components/game/game.component';
import { SteamDeckComponent } from './components/steam-deck/steam-deck.component';

const routes: Routes = [
  
  { path: '', redirectTo: 'home/store', pathMatch: 'full' },
  { path: 'login', component: LoginComponent },
  { path: 'register', component: RegisterComponent },
  { path: 'home', component: HomeComponent,
  children:[
    { path: 'store', component: StoreComponent },
  ] },
  { path: 'user-profile/:id', component: User, canActivate: [AuthGuard] },
  { path: 'game/:id', component: GameComponent},
  { path: 'steam-deck', component: SteamDeckComponent },

];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
