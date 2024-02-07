import { AuthService } from 'src/app/shared/services/auth.service';
import { Component } from '@angular/core';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.scss'],
})
export class StoreComponent {
  constructor(public authService: AuthService) {}
  logout() {
    this.authService.doLogout();
  }
}
