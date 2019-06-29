
import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-post-list-single',
  templateUrl: './post-list-single.component.html',
  styleUrls: ['./post-list-single.component.scss']
})
export class PostListSingleComponent implements OnInit {

  @Input() post: any;

  constructor() { }

  ngOnInit() {
  }

}