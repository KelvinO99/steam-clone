import { ComponentFixture, TestBed } from '@angular/core/testing';

import { UpdatesOfferCardsComponent } from './updates-offer-cards.component';

describe('UpdatesOfferCardsComponent', () => {
  let component: UpdatesOfferCardsComponent;
  let fixture: ComponentFixture<UpdatesOfferCardsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ UpdatesOfferCardsComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(UpdatesOfferCardsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
