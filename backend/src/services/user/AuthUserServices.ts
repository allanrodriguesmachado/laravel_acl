import prismaClient from "../../prisma";
import {compare, hash} from "bcryptjs";

interface AuthRequest {
    email: string,
    password: string
}

class AuthUserServices {
    async execute({email, password}: AuthRequest) {
        const user = await prismaClient.user.findFirst({
            where: {
                email: email
            }
        })

        if (!user) {
            throw new Error("Email ou senha invalido");
        }

        if (!await compare(password, user.password)) {
            throw new Error("Email ou senha invalido")
        }

        return ({ok: true})
    }
}

export {AuthUserServices};