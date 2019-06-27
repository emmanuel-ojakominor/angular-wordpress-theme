import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PostListSingleComponent } from './post-list-single.component';

describe('PostListSingleComponent', () => {
  let component: PostListSingleComponent;
  let fixture: ComponentFixture<PostListSingleComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PostListSingleComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PostListSingleComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
