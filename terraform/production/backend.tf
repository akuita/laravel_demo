terraform {
  backend "s3" {
    bucket                  = "<<PLACEHOLDER>>"
    key                     = "gtmi-demo-production/terraform.tfstate"
    region                  = "ap-northeast-1"
  }
}
