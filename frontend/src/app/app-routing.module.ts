
import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { HomeComponent } from './components/home/home.component';
import { StoreComponent } from './components/store/store.component';
import { AuthGuard } from './shared/services/auth.guard';
import { User } from './shared/services/user.service';
import { CategoryPageComponent } from './components/category-page/category-page.component';
import { GameTableComponent } from './components/store/game-table/game-table.component';
import { GameComponent } from './components/game-page/game-page.component';
import { SteamDeckComponent } from './components/steam-deck/steam-deck.component';
import { UserPageComponent } from './components/user-page/user-page.component';
import { AdminPageComponent } from './components/admin-page/admin-page.component';
import { EditPageComponent } from './components/admin-page/edit-page/edit-page.component';

const routes: Routes = [
  
  { path: '', redirectTo: 'home/store', pathMatch: 'full' },
  { path: 'login', component: LoginComponent},
  { path: 'register', component: RegisterComponent },
  { path: 'home', component: HomeComponent,
  children:[
    { path: 'store', component: StoreComponent },
  ] },
  { path: 'game/:id', component: GameComponent},
  { path: 'games/:genre', component: CategoryPageComponent},
  { path: 'steam-deck', component: SteamDeckComponent },
  { path: 'user-page/:username', component: UserPageComponent, canActivate: [AuthGuard]},
  { path: 'admin', component: AdminPageComponent, canActivate: [AuthGuard]},
  { path: 'admin/edit-page/:id', component: EditPageComponent, canActivate: [AuthGuard]}
];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
