import { Component, OnInit } from '@angular/core';
import { User } from 'src/app/shared/services/user.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-user-page',
  templateUrl: './user-page.component.html',
  styleUrls: ['./user-page.component.scss']
})
export class UserPageComponent implements OnInit {
  routeId!: number;
  user: any;
  skip: number = 0;
  take: number = 4;

  // Variabili per la modale
  isModalOpen = false;
  editData = {
    username: '',
    description: '',
    nationality: 'Catania, Sicilia, Italy' // Modifica secondo la tua necessità
  };

  constructor(public userService: User, public route: ActivatedRoute) { }

  ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
    this.getUser();
  }

  getUser() {
    this.userService.getUser(this.routeId).subscribe({
      next: (res: any) => {
        this.user = res;
        console.log(res);

        // Inizializzare editData con i dati dell'utente
        this.editData.username = this.user.user.username;
        this.editData.description = this.user.user.description;
        this.editData.nationality = this.user.user.nationality || 'Catania, Sicilia, Italy';
      }
    })
  }

  getFirstFourGames() {
    const uniqueGames = [];
    const names = new Set();

    for (const game of this.user.library) {
      if (!names.has(game.name)) {
        uniqueGames.push(game);
        names.add(game.name);
      }
      if (uniqueGames.length === 4) {
        break;
      }
    }

    return uniqueGames;
  }

  // Funzioni per la modale
  openModal() {
    this.isModalOpen = true;
  }

  closeModal() {
    this.isModalOpen = false;
  }

  onSubmit() {
    // Logica per salvare le modifiche
    this.user.user.username = this.editData.username;
    this.user.user.description = this.editData.description;
    this.user.user.nationality = this.editData.nationality;
    this.closeModal();
  }
}
