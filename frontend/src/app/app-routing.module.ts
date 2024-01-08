import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {config} from "../environments/config";
import {HeaderComponent} from "./components/header/header.component";
import {FooterComponent} from "./components/footer/footer.component";
import {SidebarComponent} from "./components/sidebar/sidebar.component";
import {ContentComponent} from "./components/content/content.component";

const routes: Routes = [{
  path: '', component: ContentComponent,
}];

/*if(config.sidebar) {
  console.log('primo routing');
  routes = [
    { path: '', component: SidebarComponent, children: [
        { path: '', component: ContentComponent, children: []},
      ]},
    { path: '', component: FooterComponent, children: []},
  ];
} else {
  console.log('secondo routing');
  routes = [
    { path: '', component: HeaderComponent, children: [
        { path: '', component: ContentComponent, children: []},
        { path: '', component: FooterComponent, children: []},
      ]},
  ];
}*/

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
