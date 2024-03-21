import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DataGameComponent } from './data-game.component';

describe('DataGameComponent', () => {
  let component: DataGameComponent;
  let fixture: ComponentFixture<DataGameComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DataGameComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(DataGameComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
