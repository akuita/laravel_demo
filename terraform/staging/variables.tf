///////////////////////////////////////////////////////////////////////////
# Need to get the credential from AWS SSM
///////////////////////////////////////////////////////////////////////////

variable "database_password" {
  description = "Name of database password"
}

variable "master_key" {
  description = "Encrypted key as rails master key"
}

variable "github_token" {
  description = "Github personal access token"
}

variable "docker_username" {
  description = "Docker Username"
}

variable "docker_password" {
  description = "Docker Password"
}

variable "app_key" {
  description = "App key"
}

variable "passport_private_key" {
  description = "Oauth private key"
}

variable "passport_public_key" {
  description = "Oauth public key"
}

///////////////////////////////////////////////////////////////////////////
# Please update default values if needed
///////////////////////////////////////////////////////////////////////////

variable "name" {
  description = "Name to be used on all the resources as identifier"
  default     = "gtmi_demo_staging"
}

variable "env" {
  description = "Environment that is used as placeholder"
  default     = "staging"
}

variable "azs" {
  description = "A list of availability zones in the region"
  default     = ["ap-northeast-1a", "ap-northeast-1c", "ap-northeast-1d"]
}

# IP architecture
# https://www.notion.so/iruuzainc/IP-architecture-85d035693086447c88fcf286f682d21b

variable "cidr" {
  description = "The CIDR block for the VPC. Default value is a valid CIDR, but not acceptable by AWS and should be overriden"
  default     = "10.21.0.0/16"
}

variable "public_subnets" {
  description = "A list of public subnets inside the VPC"
  default     = ["10.21.128.0/24", "10.21.129.0/24"]
}

variable "database_subnets" {
  description = "A list of database subnets inside the VPC"
  default     = ["10.21.192.0/26", "10.21.192.64/26"]
}

variable "elasticache_subnets" {
  description = "Elasticache Subnets"
  default     = ["10.21.193.0/26", "10.21.193.64/26"]
}


variable "database_name" {
  description = "Name of database name"
  default     = "gtmi_demo_staging"
}

variable "database_user" {
  description = "Name of database user"
  default     = "gtmi_demo_staging"
}



variable "instance_class" {
  description = "Database instance type"
  default     = "db.t3.micro"
}


variable "lb_healthcheck_path" {
  description = "Path of loadbalancer's health check"
  default     = "/api/health-check"
}

variable "github_account" {
  description = "Github account name of access token"
  default     = "Jitera"
}

variable "github_repository" {
  description = "Github repository to get source"
  default     = "<<PLACEHOLDER>>"
}

variable "github_branch" {
  description = "Git branch to get source"
  default     = "staging"
}

variable "zone_id" {
  description = "Zone ID"
  default     = "Z04107792MSQNTH3X9AUZ"
}

variable "domain" {
  description = "Domain"
  default     = "gtmi-demo-staging.project.jitera.app"
}

variable "slack_channel_id" {
  description = "Slack Channel identifier"
  default     = "<<PLACEHOLDER>>"
}

variable "slack_workspace_id" {
  description = "Slack Workspace identifier"
  default     = "<<PLACEHOLDER>>"
}


variable "aws_account_id" {
  description = "AWS Account ID"
  default     = "677804650362"
}
# s3 storage bucket
variable "iam_user_name" {
  default = "s3-staging-user"
}

variable "bucket_name" {
  default = "gtmi-demo-staging-storage"
}

variable "country_code" {
  description = "The list of restricted country"
  default     = []
}
# Example: https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/Concepts.DBInstanceClass.html
# db.t3.small: 150 connections, db.t3.medium: 500 connections 
# https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/Concepts.DBInstanceClass.html
variable "database_max_connections" { 
  description = "Maximum number of connections"
  default     = "150"
}