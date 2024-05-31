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

  constructor(public userService: User, public route: ActivatedRoute) { }

  ngOnInit() {
    this.routeId = this.route.snapshot.params['id'];
    this.getGames();
  }

  getGames() {

    this.userService.getUser(this.routeId).subscribe({
      next: (res: any) => {
        this.user = res;
        console.log(res);
      }
    })
  }


}
