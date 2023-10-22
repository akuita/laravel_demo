terraform {
  backend "s3" {
    bucket                  = "<<PLACEHOLDER>>"
    key                     = "gtmi-demo-development/terraform.tfstate"
    region                  = "ap-northeast-1"
  }
}
