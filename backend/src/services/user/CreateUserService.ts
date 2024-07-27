import prismaClient from "../../prisma";
import {hash} from "bcryptjs";

interface UserRequest {
    name: string,
    email: string,
    password: string
}

class CreateUserService {
    async execute({name, email, password}: UserRequest) {
        if (!email) {
            throw new Error("Email incorreto")
        }

        const userAlreadyExists = await prismaClient.user.findFirst({
            where: {
                email: email
            }
        });

        if (userAlreadyExists) {
            throw new Error("Email já cadastrado")
        }

        return prismaClient.user.create({
            data: {
                name: name,
                email: email,
                password: await hash(password, 8)
            },
            select: {
                id: true,
                name: true,
                email: true
            }
        });

    }
}

export {CreateUserService};