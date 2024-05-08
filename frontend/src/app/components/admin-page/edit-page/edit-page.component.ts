import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { GameService } from 'src/app/shared/services/game.service';

export interface Game {
  name: string;
/*   is_dlc: number;
  date: Date;
  base_price: number;
  discounted_price: number;
  discounted_percentage: number; 
  short_description: string;
  long_description: string;
  pegi_id: number; */
}

@Component({
  selector: 'app-edit-page',
  templateUrl: './edit-page.component.html',
  styleUrls: ['./edit-page.component.scss']
})

export class EditPageComponent {
  routeId!: number;
  game!: any;
  systemRequirements!: any;
  systemCharacteristics!: any
  gameForm!: FormGroup;


  constructor(public route: ActivatedRoute, public gameService: GameService, private formBuilder: FormBuilder){}


   ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
    this.showGame();
    
    this.gameForm = this.formBuilder.group({
      name: this.game?.game.name,
/*       is_dlc: 0,
      date: this.game?.game.date,
      base_price: this.game?.game.base_price,
      discounted_price: this.game?.game.discounted_price,
      discounted_percentage: this.game?.game.discounted_percentage,
      short_description: this.game?.game.short_description,
      long_description: this.game?.game.long_description,
      pegi_id: this.game?.game.pegi_id, */
    });
  }

  showGame() {
    this.gameService.showGame(this.routeId).subscribe({
      next: (res: any) => {
        {
          this.game = res
        }
      }
    })
  }

  updateGame(gameData: Game) {
    this.gameService.updateGame(gameData).subscribe((res) => {
      console.log(res);
    });
  }

  onSubmit() {
    if (this.gameForm.valid) {
      const newGame: Game = {
        name: this.gameForm.value.name, // Assegni l'id se necessario
/*         is_dlc: this.gameForm.value.is_dlc,
        date: this.gameForm.value.date,
        base_price: this.gameForm.value.base_price,
        discounted_price: this.gameForm.value.discounted_price,
        discounted_percentage: this.gameForm.value.discounted_percentage,
        short_description: this.gameForm.value.short_description,
        long_description: this.gameForm.value.long_description,
        pegi_id: this.gameForm.value.pegi_id, */
      };
      

      this.updateGame(newGame);
    } else {
      // Il form non è valido, mostra un messaggio di errore o gestisci l'errore in altro modo
      console.error(Error);
    }
  }
}
